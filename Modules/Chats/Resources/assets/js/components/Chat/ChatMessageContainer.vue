<template>
    <div class="user-chat w-100 overflow-hidden">

        <div class="chat-content d-lg-flex">
            <!-- start chat conversation section -->
            <div class="w-100 overflow-hidden position-relative">
                <!-- conversation user -->
                <chat-current-user
                    :chat="chat"
                    :messages="messages"
                    :auth="auth"
                ></chat-current-user>

                <!-- start chat input section -->
                <div class="position-relative">
                    <div class="chat-input-section p-4 border-top">
                        <chat-message-input
                            :chat="chat"
                        ></chat-message-input>
                    </div>
                </div>
                <!-- end chat input section -->
            </div>
            <!-- end chat conversation section -->
        </div>
        <!-- end user chat content -->
    </div>
</template>

<script>

export default {
    name: "ChatMessageContainer",
    props: {
        chat_id: {
            required: true,
        },
        auth: {
            required: true,
        },
    },
    created: function () {
        // this.moment = moment;
    },
    watch: {
        'chat_id': {
            handler: 'getData',
            immediate: true
        },
    },
    data() {
        return {
            messages: [],
            chat: [],
            message: '',
            isSendingForm: false,
            users: []
        }
    },
    methods: {
        async getData() {
            let getSingleChatRoute = route('chat.get-single-chat', {chat: this.chat_id});
            axios
                .get(getSingleChatRoute)
                .then((response) => {
                    this.messages = response.data.messages
                    this.chat = response.data.chat;
                    Echo.leave('chat.' + this.chat_id)
                    this.startWebSocket()
                });
        },
        async startWebSocket() {
            Echo.join(`chat-${this.chat_id}`)
                .here(users => {
                    this.users = users;
                })
                .joining(user => {
                    this.users.push(user);
                })
                .leaving(user => {
                    this.users = this.users.filter(u => (u.id !== user.id));
                })
                .listen('.new.message', (e) => {
                    this.messages.push(e.message);
                    if (this.auth.id != e.message.sender.id) {
                        let getMessageStatusRoute = route('chat.message-status', {message: e.message.id});
                        axios.get(getMessageStatusRoute);

                    }
                })
                .listen('.message.status', (e) => {
                    this.messages.find(o => o.id == e.message.id).data.status = e.message.data.status
                });
        }
    },
    mounted() {
        const thisInstance = this;
        this.$root.$on('new-message-sent', async function (message) {
            if (message) {
                await thisInstance.messages.push(message);
            }
        });
    },
}
</script>
