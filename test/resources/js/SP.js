<script>
    document.getElementById('category').addEventListener('change', function() {
    var category = this.value;
    document.getElementById('crudForm').action = '/admin/' + category;
    document.getElementById('crudForm').submit();
    });
</script>