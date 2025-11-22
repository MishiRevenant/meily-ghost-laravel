<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f3f4f6; padding: 40px 0;">
        <tr>
            <td align="center">
                
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    
                    <tr>
                        <td align="center" style="background-color: #1f2937; padding: 30px;">
                            <h1 style="color: #ec4899; margin: 0; font-size: 24px; letter-spacing: 1px;">MEILY GHOST</h1>
                            <p style="color: #9ca3af; margin: 5px 0 0; font-size: 12px; text-transform: uppercase;">Notificación de Contacto</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="color: #111827; margin-top: 0; font-size: 20px;">¡Hola Admin! 👻</h2>
                            <p style="color: #4b5563; line-height: 1.6;">Has recibido un nuevo mensaje a través del formulario web. Aquí están los detalles:</p>
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px; border-top: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #111827; font-weight: bold; width: 30%;">Nombre:</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $datos['nombre'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #111827; font-weight: bold;">Email:</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #4b5563;">
                                        <a href="mailto:{{ $datos['email'] }}" style="color: #ec4899; text-decoration: none;">{{ $datos['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #111827; font-weight: bold;">Asunto:</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb; color: #4b5563;">{{ $datos['asunto'] }}</td>
                                </tr>
                            </table>

                            <div style="margin-top: 30px;">
                                <p style="color: #111827; font-weight: bold; margin-bottom: 10px;">Mensaje:</p>
                                <div style="background-color: #f9fafb; padding: 15px; border-left: 4px solid #ec4899; color: #374151; font-style: italic; line-height: 1.6;">
                                    "{{ $datos['mensaje'] }}"
                                </div>
                            </div>

                            <div style="margin-top: 30px; text-align: center;">
                                <a href="mailto:{{ $datos['email'] }}?subject=RE: {{ $datos['asunto'] }}" style="background-color: #ec4899; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">Responder Ahora</a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="background-color: #1f2937; padding: 20px; color: #9ca3af; font-size: 12px;">
                            <p style="margin: 0;">&copy; {{ date('Y') }} Meily Ghost. Todos los derechos reservados.</p>
                            <p style="margin: 5px 0 0;">Este es un correo automático, por favor no respondas directamente a esta dirección si es no-reply.</p>
                            <div style="margin-top: 10px;">
                                <a href="{{ route('tienda') }}" style="color: #ec4899; text-decoration: none; margin: 0 10px;">Ir a la Tienda</a> |
                                <a href="{{ route('dashboard') }}" style="color: #ec4899; text-decoration: none; margin: 0 10px;">Panel Admin</a>
                            </div>
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>
    </table>

</body>
</html>