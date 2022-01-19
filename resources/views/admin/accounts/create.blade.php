<h1> Create accounts</h1>

<form action="{{ route('accountCreate.store') }}" method="POST">
    @csrf
    <div class="tile">
        <div class="">
            <label for="id"> id</label>
            <input @error('id') is-invalid @enderror" name="id" required type="text" name="id" id="id">

            @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="username"> Username</label>
            <input @error('username') is-invalid @enderror" name="username" required type="text" name="username"
                id="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="fullName"> fullName</label>
            <input @error('fullName') is-invalid @enderror" name="fullName" required type="text" name="fullName"
                id="fullName">

            @error('fullName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="email"> email</label>
            <input @error('email') is-invalid @enderror" name="email" required type="email" name="email" id="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="password"> password</label>
            <input @error('email') is-invalid @enderror" name="password" required type="password" name="password"
                id="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="address"> address</label>
            <input @error('address') is-invalid @enderror" name="address" required type="text" name="address"
                id="address">

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="phone"> phone</label>
            <input @error('phone') is-invalid @enderror" name="phone" required type="text" name="phone" id="phone">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="isAdmin"> isAdmin</label>
            <input @error('isAdmin') is-invalid @enderror" name="isAdmin" required type="checkbox" name="isAdmin"
                id="isAdmin">

            @error('isAdmin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="">
            <label for="avatar"> avatar</label>
            <input @error('avatar') is-invalid @enderror" name="avatar" required type="text" name="avatar" id="avatar">

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <label for="status"> status</label>
            <input @error('status') is-invalid @enderror" name="status" required type="checkbox" name="status"
                id="status">

            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="">
            <button type="submit">Create</button>
        </div>
</form>
