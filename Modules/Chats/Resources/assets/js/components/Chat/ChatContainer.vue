<template>
    <div class="layout-wrapper d-lg-flex">
        <!-- Start left sidebar-menu -->
        <chat-left-sidebar-menu></chat-left-sidebar-menu>
        <!-- end left sidebar-menu -->

        <!-- start chat-left-sidebar -->
        <chat-users-selection
            @renderChat="renderChat"
            :auth="auth"
        ></chat-users-selection>
        <!-- end chat-left-sidebar -->

        <!-- Start User chat -->
        <chat-message-container
            v-if="startChat"
            :chat_id="chatId"
            :auth="auth"
        ></chat-message-container>
        <!-- End User chat -->
    </div>
</template>

<script>

export default {
    name: "ChatContainer",
    data() {
        return {
            auth: null,
            chatId: null,
            startChat: false
        }
    },
    mounted() {
        this.getAuthUser();
    },
    methods: {
        getAuthUser() {
            axios.get('/api/profile')
                .then(response => {
                    this.auth = response.data.data;

                    this.startWebSocket()
                })
        },
        renderChat(chat_id) {
            this.chatId = null
            this.chatId = chat_id
            this.startChat = true;
        },
        async startWebSocket() {
            if (typeof Echo === 'undefined') {
                return;
            }

            Echo.join(`user-${this.auth.id}`)
                .listenToAll((event, data) => {
                    if (event == '.new.chat.started') {
                        this.$root.$emit('new-chat-started');
                    }
                })
        }
    },
}
</script>
