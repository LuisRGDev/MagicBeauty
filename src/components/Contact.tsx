import React from 'react';
import { Send, Phone, MapPin } from 'lucide-react';

export function Contact() {
  return (
    <section id="contacto" className="py-20 bg-gradient-to-br from-purple-900 to-black">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 className="text-4xl font-bold text-center mb-16 text-white">
          Contacto
        </h2>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-12">
          <div className="space-y-6">
            <div className="flex items-center space-x-4">
              <Phone className="h-6 w-6 text-pink-500" />
              <p className="text-gray-300">+1 234 567 890</p>
            </div>
            <div className="flex items-center space-x-4">
              <MapPin className="h-6 w-6 text-pink-500" />
              <p className="text-gray-300">123 Beauty Street, Ciudad</p>
            </div>
          </div>

          <form className="space-y-6">
            <input
              type="text"
              placeholder="Nombre"
              className="w-full px-4 py-3 bg-white/10 border border-purple-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-pink-500 transition-colors"
            />
            <input
              type="email"
              placeholder="Correo Electrónico"
              className="w-full px-4 py-3 bg-white/10 border border-purple-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-pink-500 transition-colors"
            />
            <textarea
              placeholder="Mensaje"
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
        </div>
      </div>
    </section>
  );
}