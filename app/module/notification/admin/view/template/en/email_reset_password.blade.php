my Body notification for (reset_password) with title Title reset_password
<a href="{{route('admin.password.reset',[$token]) }}?email={{$user['email']}}">reset password </a>