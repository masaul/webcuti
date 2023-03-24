public function authenticated(Request $request, $user){
    if ($user->akses == 'admin') {
        return redirect()->route('admin.beranda');
    } elseif($user->akses == 'pimpinan') {
        return redirect()->route('pimpinan.beranda')
    } elseif ($user->akses == 'karyawan') {
        return redirect()->route('karyawan.beranda');
    } else{
        Auth::user()->logout();
        flash('Anda tidak memiliki hak akses')->error();
        return redirect()->route('login');