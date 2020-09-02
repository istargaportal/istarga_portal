<script type="text/javascript">
    function file_selected_list()
    {
        var fi = document.getElementById('document_file');
        if (fi.files.length > 0) {
            document.getElementById('selectedFiles').innerHTML = '<h5>Total Files: <b>' + fi.files.length + '</b><h5>';
            for (var i = 0; i <= fi.files.length - 1; i++)
            {
                var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.

                fsize = bytesToSize(fsize);

                document.getElementById('selectedFiles').innerHTML =
                    document.getElementById('selectedFiles').innerHTML +
                        fname + ' (<b>' + fsize + '</b>)<br />';
            }
        }
        else { 
            alert('Please select a file.') 
        }
    }

    function file_selected_list_annexure()
    {
        var fi = document.getElementById('document_file_annexure');
        if (fi.files.length > 0) {
            document.getElementById('selectedFiles_annexure').innerHTML = '<h5>Total Files: <b>' + fi.files.length + '</b><h5>';
            for (var i = 0; i <= fi.files.length - 1; i++)
            {
                var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.

                fsize = bytesToSize(fsize);

                document.getElementById('selectedFiles_annexure').innerHTML =
                    document.getElementById('selectedFiles_annexure').innerHTML +
                        fname + ' (<b>' + fsize + '</b>)<br />';
            }
        }
        else { 
            alert('Please select a file.') 
        }
    }

    function bytesToSize(bytes) {
       var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
       if (bytes == 0) return '0 Byte';
       var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
       return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
</script>