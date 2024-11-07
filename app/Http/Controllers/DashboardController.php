namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function profile()
    {
        // Lógica para el perfil
        return view('profile');
    }

    public function settings()
    {
        // Lógica para la configuración
        return view('settings');
    }

    public function logout()
    {
        // Lógica para cerrar sesión
        auth()->logout();
        return redirect()->route('login');
    }
}
