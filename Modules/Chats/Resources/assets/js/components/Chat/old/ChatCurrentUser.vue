<template>
    <div id="users-chat" class="position-relative">
        <div class="py-3 user-chat-topbar">
            <div class="row align-items-center">
                <div class="col-sm-4 col-8">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                            <a href="javascript: void(0);" class="btn-primary user-chat-remove fs-18 p-1"><i
                                class="bx bx-chevron-left align-middle"></i></a>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="d-flex align-items-center">
                                <div
                                    class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt="">
                                    <!--                                    <span class="user-status"></span>-->
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="text-truncate mb-0 fs-18">
                                        <a href="#"
                                           class="user-profile-show text-reset">
                                            Victoria Lane
                                        </a>
                                    </h6>
                                    <!--                                    <p class="text-truncate text-muted mb-0">-->
                                    <!--                                        <small>Online</small>-->
                                    <!--                                    </p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end chat user head -->

        <!-- start chat conversation -->

        <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
            <ul class="list-unstyled chat-conversation-list d-flex flex-column-reverse" id="users-conversation">
                <template v-for="(message,index) in  messages">
                    <chat-message-item :message="message" :index="index"></chat-message-item>
                </template>
            </ul>
        </div>
        <!-- end chat conversation end -->
    </div>
</template>

<script>
export default {
    props: {
        messages: {
            required: true,
        },
    },
    data() {
        return {
            currentChatId: 'users-chat',
        }
    },
    methods: {
        scrollToBottom(id) {
            const container = document.getElementById(id);
            if (container) {
                const simpleBar = container.querySelector("#chat-conversation .simplebar-content-wrapper");

                if (simpleBar) {
                    const offsetHeight = container.querySelector(".chat-conversation-list")
                        ? container.querySelector(".chat-conversation-list").scrollHeight -
                        window.innerHeight +
                        250
                        : 0;
                    if (offsetHeight) {
                        simpleBar.scrollTo({top: offsetHeight, behavior: "smooth"});
                    }
                }
            }
        }
    },
    updated() {
        this.scrollToBottom(this.currentChatId);
    },
    mounted() {
        this.$root.$on('scrollTo', () => {
            // your code goes here
            this.scrollToBottom(this.currentChatId);
        });
    },
}
</script>

