<template>
    <div class="text-center">
        <button class="btn-success btn" style="cursor: none" v-if="isOnline">
            <span class="text-white">{{ $t('dashboard.connected_internet') }}</span>
        </button>
        <button class="btn-danger btn" style="cursor: none" v-else>
            <span class="text-white">{{ $t('dashboard.not_connected_internet') }}</span>
        </button>
    </div>
</template>

<script>
export default {
    name: 'InternetConnectionMonitor',
    data() {
        return {
            isOnline: navigator.onLine
        };
    },
    methods: {
        checkConnection() {
            this.isOnline = navigator.onLine;
        }
    },
    mounted() {
        // Check the connection status initially
        this.checkConnection();

        // Set up an interval to continuously check the connection status
        this.interval = setInterval(this.checkConnection, 5000); // Check every 5 seconds
    },
    beforeDestroy() {
        // Clear the interval when the component is destroyed
        clearInterval(this.interval);
    }
};
</script>
