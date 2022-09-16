<form action="" class="bg-white" wire:submit.prevent="create">
    <div class="p-4 border-bottom">

        <div class="mb-2 text-muted">
            Send to
            @foreach($users as $user)
                <a href="#" class="font-weight-bold"> {{ $user['name'] }}</a>{{ !$loop->last ? ', ' : null }}
            @endforeach
        </div>

        <div x-data="{ ...conversationCreateState(), ...userSearchState() }">
            <x-conversations.user-search>
                <x-slot name="suggestions">
                    <template x-for="user in suggestions" :key="user.id">
                        <a href="#" class="d-block" x-on:click="addUser(user)" x-text="user.name"></a>
                    </template>
                </x-slot>
            </x-conversations.user-search>
        </div>

        <div class="p-4 border-bottom">
            <div class="form-group">
                <label for="name">Group Name</label>
                <input type="text" id="name" class="form-control" wire:model="name" placeholder="Group Name">
            </div>

            <div class="form-group">
                <label for="body">Message</label>
                <textarea id="body" rows="3" class="form-control" wire:model="body"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Start conversation</button>
    </div>
</form>
@section('script')
    <script>
        function conversationCreateState() {
            return {
                addUser(user) {
                @this.call('addUser', user)
                    this.$refs.search.value = ''
                    this.suggestions = []
                }
            }
        }
    </script>
@endsection
