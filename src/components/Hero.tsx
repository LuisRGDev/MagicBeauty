import React from 'react';
import { Sparkle } from 'lucide-react';

export function Hero() {
  return (
    <section id="inicio" className="relative min-h-screen flex items-center justify-center overflow-hidden">
      <div className="absolute inset-0 bg-gradient-to-br from-black via-purple-900 to-pink-900" />
      
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-30" />
      </div>

      <div className="relative z-10 text-center px-4 sm:px-6 lg:px-8">
        <h1 className="text-5xl md:text-7xl font-bold text-white mb-6">
          Magic Beauty
          <Sparkle className="inline-block ml-2 h-8 w-8 text-pink-500" />
        </h1>
        <p className="text-xl md:text-2xl text-gray-200 mb-4">
          Realza tu Belleza Natural
        </p>
        <p className="text-lg text-gray-300 mb-8">
          Pestañas · Uñas · Botox · Tratamientos Faciales
        </p>
        <a
          href="#servicios"
          className="inline-block px-8 py-3 text-lg font-medium text-white bg-gradient-to-r from-pink-500 to-purple-500 rounded-full hover:from-pink-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105"
        >
          Nuestros Servicios
        </a>
      </div>

      <div className="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black to-transparent" />
    </section>
  );
}