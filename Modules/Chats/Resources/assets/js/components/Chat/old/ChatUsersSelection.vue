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
                                <h4 class="mb-4">Messages <span class="text-primary fs-13">(128)</span></h4>
                            </div>
                        </div>
                        <form>
                            <div class="input-group search-panel mb-3">
                                <input type="text" class="form-control bg-light border-0" id="searchChatUser"
                                       placeholder="Search here..." aria-label="Example text with button addon"
                                       aria-describedby="searchbtn-addon" autocomplete="off">
                                <button class="btn btn-light p-0" type="button" id="searchbtn-addon"><i
                                    class='bx bx-search align-middle'></i></button>
                            </div>
                        </form>
                    </div> <!-- .p-4 -->

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

                            <ul class="list-unstyled chat-list chat-user-list" id="usersList">
                                <li v-for="(room,index) in rooms" :id="`contact-id-${index+1}`" :key="index"
                                    data-name="favorite"
                                    :class="room.id == selected.id ? 'active' : ''">
                                    <a @click.prevent="setSelected(room)">
                                        <div class="d-flex align-items-center">
                                            <div class="chat-user-img online align-self-center me-2 ms-0">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                     class="rounded-circle avatar-xs"
                                                     alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="overflow-hidden me-2">
                                                <p class="text-truncate chat-username mb-0">
                                                    {{ room.name }}
                                                </p>
                                                <p class="text-truncate text-muted fs-13 mb-0">
                                                    last message
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
    props: {
        rooms: {
            required: true,
        },
        currentRoom: {
            required: true,
        },
    },
    data() {
        return {
            selected: '',
        }
    },
    created() {
        this.selected = this.currentRoom;
    },
    methods: {
        setSelected(room) {
            this.selected = room;
            this.$emit('roomChanged', this.selected);
        }
    }
}
</script>
