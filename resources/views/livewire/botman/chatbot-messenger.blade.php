<div>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            title: 'Chatbot - Pelita Alam',
            mainColor: '#e91e63',
            bubbleBackground: '#e91e63',
            introMessage: "✋ Hi! I'm admin SMK Pelita Alam",
        };
        // Livewire event for initializing BotMan widget
        Livewire.on('initBotManWidget', function () {
            // Initialize BotMan widget here
            // For example, you might call a JavaScript function to initialize BotMan UI
            initializeBotManWidget();
        });

        Livewire.on('openAIResponse', function (response) {
            // Handle OpenAI response here
            console.log(response.response);
            console.log(response.choices); // Jika Anda ingin mengakses pilihan lainnya
        });

        Livewire.on('botManSay', function (data) {
            // Handle BotMan replies here
            BotManWidget.message(data.message);
        });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</div>