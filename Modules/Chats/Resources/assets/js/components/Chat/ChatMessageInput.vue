<template>
    <div id="chatinput-form">
        <div class="row g-0 align-items-center">
            <div class="col">
                <div class="position-relative">
                    <input autocomplete="off" type="text"
                           v-model="message"
                           @keyup.enter="sendMessage()"
                           class="form-control  bg-light border-0 chat-input" autofocus
                           id="chat-input" placeholder="Type your message...">
                </div>
            </div>
            <div class="col-auto">
                <div class="chat-input-links ms-2 gap-md-1">
                    <div class="links-list-item">
                        <button type="submit"
                                @click="sendMessage()"
                                class="btn btn-primary btn-lg chat-send waves-effect waves-light">
                            <i class="bx bxs-send align-middle" id="submit-btn"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatMessageInput",
    props: {
        chat: {
            required: true,
        },
    },
    data() {
        return {
            message: '',
        }
    },
    methods: {
        sendMessage() {
            if (this.message == ' ') {
                return;
            }

            const sendMessageRoute = route('chat.send-message');
            axios.post(sendMessageRoute, {
                message: this.message,
                chat_id: this.chat.id,
            })
                .then(response => {
                    // if (response.status == 201) {
                    this.message = '';
                    this.$emit('message-sent');
                    this.$root.$emit('scrollTo');
                    // }
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
}
</script>

<style scoped>

</style>
