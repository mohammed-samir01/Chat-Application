<div>

    <div class="form-group">
        <label for="user" class="sr-only">User</label>
        <input
            type="text" id="user" x-on:input.debounce="search" x-ref="search" class="form-control" autocomplete="off" placeholder="Search here">
    </div>


        {{$suggestions}}

</div>
<script>
    function userSearchState() {
        return {
            suggestions: [],

            search(e) {
                fetch(`/api/search/users?q=${e.target.value}&excludedUser={{ auth()->id() }}`)
                    .then(response => response.json())
                    .then((suggestions) => {
                        this.suggestions = suggestions
                    })
            }
        }
    }
</script>
