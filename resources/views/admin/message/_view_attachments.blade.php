<ul class="mailbox-attachments clearfix">
    @foreach($message->attachments as $attachment)
        <li>
          <span class="mailbox-attachment-icon small"><i class="fa fa-paperclip"></i></span>
          <div class="mailbox-attachment-info">
            <a href="#" class="mailbox-attachment-name"><i class="fa fa-file"></i> {{ $attachment->path }}</a>
                <span class="mailbox-attachment-size">
                  {{ $attachment->size }}
                  <a href="{{ route('attachment.download', $attachment->path) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                </span>
          </div>
        </li>
    @endforeach
</ul>