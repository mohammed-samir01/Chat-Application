<form action="#"
      class="bg-light"
      x-data="conversationReplyState()"
      wire:submit.prevent="reply"
      enctype="multipart/form-data">

    @if($attachment)
    <div class="input-group">
        <div class="d-inline-flex align-items-center p-1 rounded border">
            @if(in_array($attachment->extension(), ['jpg', 'jpeg', 'png', 'gif']))
            <img src="{{ $attachment->temporaryUrl() }}" class="img-fluid" alt="Attachment" width="80">
            @elseif(in_array($attachment->extension(), ['mp3', 'wav']))
            <audio src="{{ $attachment->temporaryUrl() }}" controls></audio>
            @elseif(in_array($attachment->extension(), ['mp4', 'avi', 'mov']))
            <video src="{{ $attachment->temporaryUrl() }}" controls style="width: 150px ; height: 100px" ></video>
            @endif
        </div>
    </div>
        <button type="button"
                class="btn btn-sm btn-outline-danger text-black mt-1"
                wire:click="removeAttachment()">
            Remove
        </button>
    @endif


    <div class="input-group">
        <input type="text"
               wire:model="body"
               x-on:keydown.enter="submit"
               placeholder="Type a message"
               aria-describedby="button-addon2"
               class="form-control rounded-0 border-0 py-4 bg-light"
        >

        <div class="input-group-append">
            <button id="button-addon1" type="button" class="btn btn-link" x-on:click="attach"> <i class="fa fa-paperclip file-browser"></i></button>
            <input type="file" id="file_upload_id" wire:model="attachment" name="attachment" style="display: none;">
            <button id="button-addon2" type="submit" class="btn btn-link" x-ref="submit"> <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</form>

<script type="application/javascript">
    function conversationReplyState() {
        return {
            attach () {
                document.getElementById('file_upload_id').click();
            },
            submit () {
                this.$refs.submit.click()
            }

        }
    }
</script>

