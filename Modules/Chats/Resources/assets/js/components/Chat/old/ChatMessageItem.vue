<template>
    <li class="chat-list right" :id="`chat-list-${index+1}`">
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
                        09:44 pm
                    </small>
                    <span
                        class="text-success check-message-icon">
                        <i class="bx bx-check"></i>
                    </span>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    props: {
        message: {
            required: true,
        },
        index: {
            required: true,
        },
    },
}
</script>

<style scoped>

</style>
