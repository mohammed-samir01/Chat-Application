<div class="h5 mb-0 py-1" x-data="{ ...userAddState(), ...userSearchState() }">
    <div class="d-flex justify-content-between">
        <div class="font-weight-bold text-muted">
            @foreach($users as $user)
                {{ $user->name }}{{ !$loop->last ? ', ' : null }}
            @endforeach
        </div>

        <a href="#" x-on:click="show = !show">Add person</a>
    </div>

    <div x-show="show">
        <x-conversations.user-search>
            <x-slot name="suggestions">
                <template x-for="user in suggestions" :key="user.id">
                    <a href="#" class="d-block" x-on:click="addUser(user)" x-text="user.name"></a>
                </template>
            </x-slot>
        </x-conversations.user-search>
    </div>
</div>

<script>
    function userAddState() {
        return {
            show: false,

            addUser(user) {
            @this.call('addUser', user)
                this.$refs.search.value = '';
                this.suggestions = [];
                this.show = false
            }

        }
    }
</script>
