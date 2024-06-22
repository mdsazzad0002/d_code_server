
    <div class="row">
        <div class="col-4">
            Name
        </div>
        <div class="col-8">
            : {{ $user->name }}
        </div>
        <div class="col-4">
            Email
        </div>
        <div class="col-8">
            : {{ $user->email }}
        </div>
        <div class="col-4">
            Role
        </div>
        <div class="col-8">
            : {{ $user->role }}
        </div>
        <div class="col-4">
            Status
        </div>
        <div class="col-8">
            :  {{ $user->email_verified_at == null ? 'Unverified' : 'Verified' }}
        </div>
        <div class="col-4">
            Created At
        </div>
        <div class="col-8">
            : {{ $user->created_at->format('d-M-Y h:s A') }}
        </div>
    </div>






