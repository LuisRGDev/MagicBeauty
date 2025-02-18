import React from 'react';
import { ServiceList } from './ServiceList';

export function Services() {
  return (
    <section id="servicios" className="py-20 bg-black">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 className="text-4xl font-bold text-center mb-16 bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent">
          Nuestros Servicios
        </h2>
        <ServiceList />
      </div>
    </section>
  );
}