<!-- Button trigger modal -->
<button type="button" class="{{ $btnClass?$btnClass : 'btn btn-primary' }}" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $id }}">
 {{ $btnText }}
</button>

<!-- Modal -->
<div class="modal fade" id="confirmModal-{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="get" action="{{ $url }}">
        <h3>are You sure to contiue this action</h3>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
    </div>
  </div>
</div>
