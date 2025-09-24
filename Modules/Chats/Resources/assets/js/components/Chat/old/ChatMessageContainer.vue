<template>
    <div class="user-chat w-100 overflow-hidden">

        <div class="chat-content d-lg-flex">
            <!-- start chat conversation section -->
            <div class="w-100 overflow-hidden position-relative">
                <!-- conversation user -->
                <chat-current-user
                    :messages="messages"
                ></chat-current-user>

                <!-- start chat input section -->
                <div class="position-relative">
                    <div class="chat-input-section p-4 border-top">
                        <chat-message-input
                            :room="room"
                            @message-sent="handleMessageSent"
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
    props: {
        room: {
            required: true,
        },
        messages: {
            required: true,
        },
    },
    methods: {
        handleMessageSent() {
            // this.$emit('message-sent-parent'); // Propagate the event to the parent component
        },

    }
}
</script>
