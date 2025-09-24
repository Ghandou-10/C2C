<template>
    <div class="layout-wrapper d-lg-flex">
        <!-- Start left sidebar-menu -->
        <chat-left-sidebar-menu></chat-left-sidebar-menu>
        <!-- end left sidebar-menu -->

        <!-- start chat-left-sidebar -->
        <chat-users-selection
            :rooms="chatRooms"
            :currentRoom="currentRoom"
            v-on:roomChanged="setRoom($event)"
        ></chat-users-selection>
        <!-- end chat-leftsidebar -->

        <!-- Start User chat -->
        <chat-message-container
            v-if="currentRoom.id"
            :messages="messages"
            :room="currentRoom"
            @message-sent-parent="getMessages"
        ></chat-message-container>
        <!-- End User chat -->
    </div>
</template>

<script>

export default {
    data() {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: [],
        }
    },
    watch: {
        currentRoom(newVal, oldVal) {
            if (oldVal.id) {
                this.disconnect(oldVal);
            }
            this.connect();
        }
    },
    methods: {
        connect() {
            if (this.currentRoom.id) {
                let vm = this;
                this.getMessages();
                Echo.private("chat." + this.currentRoom.id)
                    .listen('.message.new', e => {
                        vm.getMessages();
                    })
            }
        },
        disconnect(room) {
            Echo.leave("chat." + room.id);
        },
        getRooms() {
            const chatRoomsRoute = route('dashboard.chats.rooms');
            axios.get(chatRoomsRoute)
                .then(response => {
                    this.chatRooms = response.data;
                    // this.setRoom(response.data[0])
                })
                .catch(error => {
                    console.log(error);
                });
        },
        setRoom(room) {
            this.currentRoom = room;
        },
        getMessages() {
            const chatRoomMessages = route('dashboard.chats.room.messages', {
                'chat_room': this.currentRoom,
            });
            axios.get(chatRoomMessages)
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getRooms();
    }
}
</script>
