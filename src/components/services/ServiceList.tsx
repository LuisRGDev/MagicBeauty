import React from 'react';
import { Sparkles, Flower, Sparkle } from 'lucide-react';
import { ServiceCard } from './ServiceCard';

const services = [
  {
    title: 'Pestañas',
    description: 'Extensiones y lifting de pestañas para una mirada impactante.',
    icon: Sparkle,
    imageUrl: 'https://images.unsplash.com/photo-1561577101-3e721732c1df?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  },
  {
    title: 'Uñas',
    description: 'Manicure, pedicure y nail art personalizados.',
    icon: Flower,
    imageUrl: 'https://images.unsplash.com/photo-1604654894610-df63bc536371?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  },
  {
    title: 'Botox',
    description: 'Tratamientos faciales para rejuvenecer tu piel.',
    icon: Sparkles,
    imageUrl: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
  }
];

export function ServiceList() {
  return (
    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
      {services.map((service, index) => (
        <ServiceCard
          key={service.title}
          {...service}
          delay={index * 0.2}
        />
      ))}
    </div>
  );
}