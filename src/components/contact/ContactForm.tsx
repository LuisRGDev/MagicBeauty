import React, { useState } from 'react';
import { Send } from 'lucide-react';
import { validateContactForm, FormData } from '../../utils/validation';

export function ContactForm() {
  const [formData, setFormData] = useState<FormData>({
    name: '',
    email: '',
    message: ''
  });
  const [errors, setErrors] = useState<string[]>([]);
  const [sending, setSending] = useState(false);
  const [honey, setHoney] = useState('');

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const validation = validateContactForm(formData);
    
    if (!validation.isValid) {
      setErrors(validation.errors);
      return;
    }
    setErrors([]);
    setSending(true);

    // Enviar vía FormSubmit (sin backend) al correo indicado
    const payload = new FormData();
    payload.append('name', formData.name);
    payload.append('email', formData.email);
    payload.append('message', formData.message);
    // Honeypot: si está lleno, asumimos spam y abortamos silenciosamente
    if (honey.trim() !== '') {
      setSending(false);
      return;
    }

    // Redirección de agradecimiento y desactivar captcha de FormSubmit (opcional)
    payload.append('_next', window.location.origin + '/gracias.html');
    payload.append('_captcha', 'false');
    payload.append('_subject', 'Nuevo mensaje desde la web');

    fetch('https://formsubmit.co/gismiri23@gmail.com', {
      method: 'POST',
      body: payload
    }).then((res) => {
      if (res.ok) {
        alert('¡Mensaje enviado con éxito!');
        setFormData({ name: '', email: '', message: '' });
      } else {
        alert('Hubo un problema al enviar el formulario. Intenta de nuevo.');
      }
    }).catch((err) => {
      console.error('Error enviando formulario:', err);
      alert('No se pudo enviar el formulario. Por favor intenta más tarde.');
    }).finally(() => {
      setSending(false);
    });
  };

  return (
    <form onSubmit={handleSubmit} className="space-y-6">
      {errors.length > 0 && (
        <div className="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          {errors.map((error, index) => (
            <p key={index}>{error}</p>
          ))}
        </div>
      )}
      
      <input
        type="text"
        placeholder="Nombre"
        value={formData.name}
        onChange={(e) => setFormData({ ...formData, name: e.target.value })}
        className="w-full px-4 py-3 bg-white/10 border border-purple-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-pink-500 transition-colors"
      />
      
      <input
        type="email"
        placeholder="Correo Electrónico"
        value={formData.email}
        onChange={(e) => setFormData({ ...formData, email: e.target.value })}
        className="w-full px-4 py-3 bg-white/10 border border-purple-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-pink-500 transition-colors"
      />
      
      <textarea
        placeholder="Mensaje"
        value={formData.message}
        onChange={(e) => setFormData({ ...formData, message: e.target.value })}
        rows={4}
        className="w-full px-4 py-3 bg-white/10 border border-purple-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-pink-500 transition-colors"
      />
      
      <button
        type="submit"
        className="w-full px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg flex items-center justify-center space-x-2 hover:from-pink-600 hover:to-purple-600 transition-colors"
        disabled={sending}
      >
        <span>{sending ? 'Enviando...' : 'Enviar Mensaje'}</span>
        <Send className="h-5 w-5" />
      </button>
    </form>
  );
}