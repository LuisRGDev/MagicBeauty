import React from 'react';
import { Sparkles, Flower, Sparkle } from 'lucide-react';

const services = [
  {
    title: 'Pestañas',
    description: 'Extensiones y lifting de pestañas para una mirada impactante.',
    icon: Sparkle,
    image: 'https://images.unsplash.com/photo-1583001931096-959e9a1a6223?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  },
  {
    title: 'Uñas',
    description: 'Manicure, pedicure y nail art personalizados.',
    icon: Flower,
    image: 'https://images.unsplash.com/photo-1604654894610-df63bc536371?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  },
  {
    title: 'Botox',
    description: 'Tratamientos faciales para rejuvenecer tu piel.',
    icon: Sparkles,
    image: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  }
];

export function Services() {
  return (
    <section id="servicios" className="py-20 bg-black">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 className="text-4xl font-bold text-center mb-16 bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
          Nuestros Servicios
        </h2>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {services.map((service) => (
            <div
              key={service.title}
              className="group relative overflow-hidden rounded-2xl"
            >
              <div className="absolute inset-0">
                <img
                  src={service.image}
                  alt={service.title}
                  className="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent" />
              </div>

              <div className="relative p-8 h-full flex flex-col justify-end">
                <service.icon className="h-8 w-8 text-pink-500 mb-4" />
                <h3 className="text-2xl font-bold text-white mb-2">
                  {service.title}
                </h3>
                <p className="text-gray-300">{service.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}