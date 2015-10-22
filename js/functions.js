$(document).ready(
        function () {
        var h = $("#panel1").height();
                $("#panel2").height(h);
        }

);
        
$('tr td a.btn.btn-danger').on('click', function() {

var $row = $(this).closest('tr');
        var id = $row[0].getAttribute('id');
        $row.load('index.php?id=' + id +'&mode=delete' //because of string parameter, it's GET query
        , function() {
        $row.fadeOut('slow',
                function() {
                $(this).remove();
                });
        });
});

