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

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const validation = validateContactForm(formData);
    
    if (!validation.isValid) {
      setErrors(validation.errors);
      return;
    }

    // Aquí iría la lógica para enviar el formulario
    console.log('Formulario enviado:', formData);
    setFormData({ name: '', email: '', message: '' });
    setErrors([]);
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
      >
        <span>Enviar Mensaje</span>
        <Send className="h-5 w-5" />
      </button>
    </form>
  );
}