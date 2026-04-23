<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'localidad' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'casunto' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        try {
            Mail::to(['agi.iniguez@gmail.com'])->send(new ContactMail($data));
            return response()->json(['success' => true, 'message' => 'Mensaje enviado correctamente.']);
        } catch (\Exception $e) {
            // Fallback: intentar PHPMailer directamente (acepta certificado autofirmado)
            try {
                $phpMailerPath = base_path('public/assets/send/PHPMailerAutoload.php');
                if (file_exists($phpMailerPath)) {
                    require_once $phpMailerPath;
                    $mail = new \PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = env('MAIL_HOST');
                    $mail->SMTPAuth = true;
                    $mail->Username = env('MAIL_USERNAME');
                    $mail->Password = env('MAIL_PASSWORD');
                    $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'ssl');
                    $mail->Port = (int) env('MAIL_PORT', 465);
                    $mail->From = env('MAIL_FROM_ADDRESS', 'no-reply@example.com');
                    $mail->FromName = env('MAIL_FROM_NAME', config('app.name'));
                    $mail->addAddress('agi.iniguez@gmail.com');
                    $mail->isHTML(true);
                    // Enable SMTP debug capture
                    $debugOutput = '';
                    $mail->SMTPDebug = 2;
                    $mail->Debugoutput = function($str, $level) use (&$debugOutput) { $debugOutput .= $str . "\n"; };
                    $mail->Subject = $data['casunto'];
                    $body = "<strong>Nombre y Apellido:</strong> " . htmlspecialchars($data['name']) . "<br />";
                    $body .= "<strong>Localidad:</strong> " . htmlspecialchars($data['localidad'] ?? '') . "<br />";
                    $body .= "<strong>E-mail:</strong> " . htmlspecialchars($data['email']) . "<br />";
                    $body .= "<strong>Teléfono:</strong> " . htmlspecialchars($data['telefono'] ?? '') . "<br />";
                    $body .= "<strong>Mensaje:</strong> <br />" . nl2br(htmlspecialchars($data['comment']));
                    $mail->Body = $body;
                    // Permitir certificados autofirmados (solo fallback de prueba)
                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ],
                    ];
                    if ($mail->send()) {
                        return response()->json(['success' => true, 'message' => 'Mensaje enviado (fallback PHPMailer).', 'debug_smtp' => $debugOutput]);
                    } else {
                        return response()->json(['success' => false, 'message' => 'Error al enviar correo (PHPMailer).', 'error' => $mail->ErrorInfo, 'debug_smtp' => $debugOutput], 500);
                    }
                } else {
                    return response()->json(['success' => false, 'message' => 'Error al enviar correo. PHPMailer no disponible.', 'error' => $e->getMessage()], 500);
                }
            } catch (\Exception $ex) {
                return response()->json(['success' => false, 'message' => 'Error al enviar correo.', 'error' => $e->getMessage() . ' | fallback: ' . $ex->getMessage()], 500);
            }
        }
    }
}
