<script>
    $(document).ready(function() {
        $('#share-page').click(function() {
            var copyText = $('#current-url');
    
            if (window.isSecureContext && naviagator.clipboard) {
                copyToClipboard(copyText.val());
            }
            else {
                unsecuredCopyToClipboard(copyText.val());
            }
    
            displayNotification();
        });
    
        function displayNotification() {
            var alert = $('#alert');
            alert.removeClass('d-none');
    
            var alertContainer = alert.find('.container');
            alertContainer.first().text('Link to this page copied successfully');
        }

        function copyToClipboard(value) {
            navigator.clipboard.writeText(copyText.val());
        }

        function unsecuredCopyToClipboard(value) {
            var textArea = document.createElement('textarea');
            textArea.value = value;
            document.body.prepend(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
            } catch (error) {
                console.error('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
        }
    });
</script>