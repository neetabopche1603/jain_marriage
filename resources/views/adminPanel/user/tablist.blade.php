 <!-- Nav tabs -->
 <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ \Request::input('tab') == 'personal_details' ? 'active' : '' }}"
           href="{{ url('admin/user-edit') }}/{{ $usersEdit->id }}?tab=personal_details" role="tab" aria-selected="true">
           Basic & Personal Details
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ \Request::input('tab') == 'family_details' ? 'active' : '' }}"
           href="{{ url('admin/user-family-edit') }}/{{ $usersEdit->id }}?tab=family_details" role="tab">
           Family Details
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ \Request::input('tab') == 'partner_details' ? 'active' : '' }}"
           href="{{ url('admin/user-partner-edit') }}/{{ $usersEdit->id }}?tab=partner_details" role="tab">
           Partner Preference
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ \Request::input('tab') == 'document_upload_details' ? 'active' : '' }}" href="{{ url('admin/user-document-edit') }}/{{ $usersEdit->id }}?tab=document_upload_details"
            role="tab">
            Verify Document status & Upload
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ \Request::input('tab') == 'profile_photo_upload_details' ? 'active' : '' }}" href="{{ url('admin/user-upload-photo-edit') }}/{{ $usersEdit->id }}?tab=profile_photo_upload_details"
            role="tab">
            Profile Image
        </a>
    </li>



 </ul>
