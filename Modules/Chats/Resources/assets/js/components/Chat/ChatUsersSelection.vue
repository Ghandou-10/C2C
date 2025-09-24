<template>
    <div class="chat-leftsidebar">

        <div class="tab-content">
            <!-- Start chats tab-pane -->
            <div class="tab-pane show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                <!-- Start chats content -->
                <div>
                    <div class="px-4 pt-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">Messages <span class="text-primary fs-13">({{ chats.length }})</span>
                                </h4>
                            </div>
                        </div>
                        <div class="input-group search-panel mb-3">
                            <input type="text" class="form-control bg-light border-0"
                                   id="searchChatUser"
                                   v-model="searchEmail"
                                   @keyup.enter="searchUsers"
                                   placeholder="Search here..."
                                   aria-label="Example text with button addon"
                                   aria-describedby="searchbtn-addon"
                                   autocomplete="off">
                            <button class="btn btn-light p-0"
                                    type="button"
                                    @click="searchUsers"
                                    id="searchbtn-addon">
                                <i class='bx bx-search align-middle'></i>
                            </button>
                        </div>
                    </div> <!-- .p-4 -->

                    <div class="chat-room-list" data-simplebar v-if="searchEmail">
                        <!-- Start chat-message-list -->
                        <div class="d-flex align-items-center px-4 mt-2 mb-2">
                            <div class="flex-grow-1">
                                <h4 class="mb-0 fs-11 text-muted text-uppercase">Select User</h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                     title="New Message">
                                </div>
                            </div>
                        </div>

                        <div class="chat-message-list">

                            <ul class="list-unstyled chat-list chat-user-list" id="searchUsersList">
                                <li v-for="(user,index) in searchedUsers" :id="`contact-id-${user.id}`" :key="user.id"
                                    data-name="favorite">
                                    <a @click.prevent="onSelect" style="cursor: pointer">
                                        <div class="d-flex align-items-center">
                                            <div class="chat-user-img online align-self-center me-2 ms-0">
                                                <img :src="user.avatar"
                                                     class="rounded-circle avatar-xs"
                                                     alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="overflow-hidden me-2">
                                                <p class="text-truncate chat-username mb-0">
                                                    {{ user.name }}
                                                </p>
                                                <p class="text-truncate text-muted fs-13 mb-0">
                                                    {{ user.email }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End chat-message-list -->
                    </div>

                    <div class="chat-room-list" data-simplebar>
                        <!-- Start chat-message-list -->
                        <div class="d-flex align-items-center px-4 mt-2 mb-2">
                            <div class="flex-grow-1">
                                <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages</h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                     title="New Message">

                                    <!--                                    &lt;!&ndash; Button trigger modal &ndash;&gt;-->
                                    <!--                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"-->
                                    <!--                                            data-bs-target=".contactModal">-->
                                    <!--                                        <i class="bx bx-plus align-middle"></i>-->
                                    <!--                                    </button>-->
                                </div>
                            </div>
                        </div>

                        <div class="chat-message-list">

                            <ul class="list-unstyled chat-list chat-user-list" id="usersList" v-if="chats.length">
                                <li
                                    v-for="(chat,index) in chats"
                                    :id="`contact-id-${chat.id}`"
                                    :key="chat.id"
                                    data-name="favorite"
                                    style="cursor: pointer"
                                    @click.prevent="openChat(chat.id)"
                                    :class="chat.id == chat_id ? 'active' : ''">

                                    <a
                                        v-for="participant in chat.participants"
                                        v-if="auth.id != participant.id"
                                        :key="participant.id">
                                        <div class="d-flex align-items-center">
                                            <div class="chat-user-img online align-self-center me-2 ms-0">
                                                <img :src="participant.avatar"
                                                     class="rounded-circle avatar-xs"
                                                     alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="overflow-hidden me-2">
                                                <p class="text-truncate chat-username mb-0">
                                                    {{ participant.name }}
                                                </p>
                                                <p class="text-truncate text-muted fs-13 mb-0">
                                                    {{ participant.email }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                            </ul>
                        </div>
                        <!-- End chat-message-list -->
                    </div>

                </div>
                <!-- Start chats content -->
            </div>
            <!-- End chats tab-pane -->
        </div>
        <!-- end tab content -->
    </div>
</template>

<script>

export default {
    name: "ChatUsersSelection",
    emits: ["renderChat"],
    props: {
        auth: {
            required: true,
        },
    },
    data() {
        return {
            chat_id: null,
            chats: [],
            isSendingForm: false,
            searchedUsers: [],
            searchEmail: '',
        }
    },
    created() {
        this.getData()
    },
    methods: {
        searchUsers() {
            this.isSendingForm = true;
            const searchUsersRoute = route('chat.search_users', {email: this.searchEmail})
            axios.post(searchUsersRoute)
                .then((response) => {
                    this.isSendingForm = false;
                    this.searchedUsers = response.data.users
                })
                .catch((error) => {
                    console.log(error);
                    this.isSendingForm = false;
                });
        },
        async onSelect() {
            this.isSendingForm = true;
            let user = this.searchedUsers.find(o => o.email == this.searchEmail);
            if (user) {
                var data = new FormData();
                data.append('users[]', user.id);
                data.append('isPrivate', 1);
                const createChatRoute = route('chat.create-chat')
                axios.post(
                    createChatRoute, data)
                    .then((response) => {
                        this.isSendingForm = false;
                        this.openChat(response.data.chat.id)
                    })
                    .catch((error) => {
                        console.log(error);
                        this.isSendingForm = false;
                    });
            }
        },
        async openChat(chat_id) {
            await Echo.leave('chat.' + this.chat_id);
            this.chat_id = chat_id
            this.$emit("renderChat", chat_id);
        },
        getData() {
            let getChatsRoute = route('chat.get-chats')
            axios
                .get(getChatsRoute)
                .then((response) => {
                    this.chats = response.data.chats
                });
        },
    },
    mounted() {
        this.$root.$on('new-chat-started', () => {
            this.searchEmail = '';
            this.searchedUsers = [];
            this.getData();
        });
    },
}
</script>
