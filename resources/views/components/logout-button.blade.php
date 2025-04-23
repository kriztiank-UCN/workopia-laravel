<form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="cursor-pointer text-white hover:text-yellow-500">
    <i class="fa fa-sign-out"></i> Logout
  </button>
</form>
