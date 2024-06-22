<script>
$('.pagination a').on('click', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    $.get(url, $('#search').serialize(), function(data){
        $('#paginated_content').html(data);
        Prism.highlightAll();
    });
});
</script>
