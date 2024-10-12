<!-- Button trigger modal -->
<button type="button" class="{{ isset($btnClass)? $btnClass : 'btn btn-primary' }}" data-bs-toggle="modal" data-bs-target="#storeModel">
  {{ $btnText }}
</button>

<!-- Modal -->
<div class="modal fade" id="storeModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include('users.includes.userForm', ['url'=>'/users/store'])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
