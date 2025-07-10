import React from 'react';
import { Phone, MapPin } from 'lucide-react';
import { ContactForm } from './ContactForm';

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

          <ContactForm />
        </div>
      </div>
    </section>
  );
}