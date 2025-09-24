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
                        <div class="flex-grow-1 overflow-hidden" v-for="participant in chat.participants"
                             :key="participant.id" v-if="auth.id != participant.id">
                            <div class="d-flex align-items-center">
                                <div
                                    class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                    <img :src="participant.avatar" class="rounded-circle avatar-sm" alt="">
                                    <!--                                    <span class="user-status"></span>-->
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h6 class="text-truncate mb-0 fs-18">
                                        <a href="#"
                                           class="user-profile-show text-reset">
                                            {{ participant.name }}
                                        </a>
                                    </h6>
                                    <p class="text-truncate text-muted mb-0">
                                        <small>Online</small>
                                    </p>
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
            <ul class="list-unstyled chat-conversation-list" id="users-conversation">
                <template v-for="(message,index) in  messages">
                    <li class="chat-list right" :id="`chat-list-${message.id}`" :key="message.id"
                        v-if="auth.id == message.sender.id">
                        <div class="conversation-list">
                            <div class="user-chat-content">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content">
                                        <p class="mb-0 ctext-content">
                                            {{ message.message }}
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-name">
                                    <small class="text-muted time">
                                        {{ moment(message.created_at).format("h:m a") }}
                                    </small>
                                    <span
                                        class="text-success check-message-icon">
                                            <i class="bx bx-check"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="chat-list left" :id="`chat-list-${message.id}`" :key="message.id" v-else>
                        <div class="conversation-list">
                            <div class="user-chat-content">
                                <div class="ctext-wrap">
                                    <div class="ctext-wrap-content" id="3">
                                        <p class="mb-0 ctext-content">
                                            {{ message.message }}
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-name">
                                    <small class="text-muted time">
                                        {{ moment(message.created_at).format("h:m a") }}
                                    </small>
                                    <span
                                        class="text-success check-message-icon" v-if="message.data.status">
                                            <i class="bx bx-check-double"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
        <!-- end chat conversation end -->
    </div>
</template>

<script>
import moment from 'moment'

export default {
    name: "ChatCurrentUser",
    props: {
        messages: {
            required: true,
        },
        chat: {
            required: true,
        },
        auth: {
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
            this.scrollToBottom(this.currentChatId);
        });
    },
    created: function () {
        this.moment = moment;
    },
}
</script>

