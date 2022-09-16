<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container py-5 px-4">

                        <div class="row rounded-lg overflow-hidden shadow">

                            @include('conversations.partials.header')

                            <!-- Users box-->
                            <div class="col-5 px-0">
                                <div class="bg-white">

                                  <livewire:conversations.conversation-users :conversation="$conversation"
                                                                             :users="$conversation->users"    />

                                    <div class="messages-box">
                                        <div class="list-group rounded-0">

                                            <livewire:conversations.conversation-list :conversations="$conversations"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat Box-->
                            <div class="col-7 px-0">
                                <div class="px-4 py-5 chat-box bg-white">

                                    <livewire:conversations.conversation-messages :conversation="$conversation"
                                                                                  :messages="$conversation->messages"/>
                                </div>

                                <!-- Typing area -->
                                <livewire:conversations.conversation-reply :conversation="$conversation"/>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@section('script')
    <script>
        $(function() {
            $('.chat-box').stop().animate({
                scrollTop: $('.chat-box')[0].scrollHeight
            }, 500);
        });
    </script>
@endsection

