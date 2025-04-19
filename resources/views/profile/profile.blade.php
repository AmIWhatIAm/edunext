@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="profile-container">

    <!-- Profile Heading (Add here above the profile picture) -->
    <div class="profile-header">
      <h2 id="profile-heading">Your Profile</h2> <!-- The heading will change based on mode -->
    </div>

    <!-- Profile Section with Picture and Info -->
    <div class="profile-header">
      <div class="profile-pic">
      <img src="{{ asset($user->role == 'lecturer' ? 'image/Teacher.png' : 'image/ProfileImage.png') }}"
        alt="Profile Picture" class="profile-image">
      </div>
      <div class="profile-info">
      <h2>{{ $user->name }}</h2>
      <p class="email">{{ $user->email }}</p>
      <p class="role">{{ ucfirst($user->role) }}</p>
      </div>
    </div>

    <!-- Profile Details Section -->
    <div class="profile-details">
      <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
      @csrf
      @method('PUT')

      <!-- Name Field -->
      <p><strong>Name:</strong>
        <span id="name-view">{{ $user->name }}</span>
        <input type="text" id="name-edit" name="name" value="{{ $user->name }}" class="editable-field"
        style="display:none;">
      </p>

      <!-- Email Field (Read-Only) -->
      <p><strong>Email:</strong>
        <span id="email-view">{{ $user->email }}</span>
        <input type="text" id="email-edit" name="email" value="{{ $user->email }}" style="display:none;" readonly>
      </p>

      <!-- Gender Field -->
      <p><strong>Gender:</strong>
        <span id="gender-view">{{ ucfirst($user->gender) }}</span>
        <select id="gender-edit" name="gender" class="editable-field" style="display:none;">
        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
        <option value="private" {{ $user->gender == 'private' ? 'selected' : '' }}>Private</option>
        </select>
      </p>

      <!-- Bio Field -->
      <p><strong>Bio:</strong>
        <span id="bio-view">{{ $user->bio }}</span>
        <textarea id="bio-edit" name="bio" class="bio-field " style="display:none;">{{ $user->bio }}</textarea>
      </p>

      <!-- Edit and Save Buttons -->
      <div id="edit-buttons">
        <button type="button" class="btn btn-primary" id="edit-btn">Edit Profile</button>
        <button type="submit" class="btn btn-success" id="save-btn" style="display:none;">Save Changes</button>
      </div>
      </form>
    </div>
    </div>
  </div>

  <style>
    .profile-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    width: 100%;
    margin: 0 auto;
    box-shadow: none;
    }

    .profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    width: 100%;
    justify-content: center;
    }

    /* Profile Heading */
    #profile-heading {
    font-size: 1.5rem;
    font-weight: bold;
    color: #252641
    }

    .profile-pic img.profile-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ddd;
    }

    .profile-info {
    margin-left: 20px;
    }

    .profile-info h2 {
    margin: 0;
    font-size: 1.5rem;
    }

    .profile-info .email,
    .profile-info .role {
    color: #777;
    font-size: 1rem;
    }

    .profile-details {
    margin-top: 20px;
    }

    .profile-details p {
    font-size: 1rem;
    margin: 20px 0;
    }

    /* Editable Fields */
    .editable-field {
    display: block;
    margin-top: 10px;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #d0d3e5;
    width: 60%;
    border: 1px solid #49BBBD;
    /* border color change */
    border-radius: 5px;
    }

    .bio-field {
    display: block;
    margin-top: 10px;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #d0d3e5;
    width: 100%;
    height: 150px;
    border: 1px solid #49BBBD;
    border-radius: 5px;
    }


    .editable-field:focus {
    border: 2px solid #49BBBD;
    outline: none;
    }

    /* Edit Profile Button Color */
    .btn.btn-primary {
    background-color: #252641;
    border: none;
    font-weight: bold;
    width: 100%
    }

    .btn-success {
    background-color: #49BBBD;
    border: none;
    font-weight: bold;
    width: 100%
    }

    .btn-success:hover {
    background-color: #252641;
    }


    .btn {
    margin-top: 20px;
    }
  </style>

  <script>
    // JavaScript to toggle between view and edit modes
    document.getElementById('edit-btn').addEventListener('click', function () {
    // Change profile heading
    document.getElementById('profile-heading').innerText = 'Edit Profile';

    // Toggle the visibility of the fields
    document.getElementById('name-view').style.display = 'none';
    document.getElementById('name-edit').style.display = 'inline-block';
    document.getElementById('email-view').style.display = 'none';
    document.getElementById('email-edit').style.display = 'inline-block';
    document.getElementById('gender-view').style.display = 'none';
    document.getElementById('gender-edit').style.display = 'inline-block';
    document.getElementById('bio-view').style.display = 'none';
    document.getElementById('bio-edit').style.display = 'inline-block';

    // Show the Save button and hide the Edit button
    document.getElementById('save-btn').style.display = 'inline-block';
    document.getElementById('edit-btn').style.display = 'none';
    });
  </script>
@endsection