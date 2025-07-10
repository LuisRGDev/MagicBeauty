import React from 'react';
import { Navbar } from './components/navbar/Navbar';
import { Hero } from './components/hero/Hero';
import { Services } from './components/services/Services';
import { Contact } from './components/contact/Contact';

function App() {
  return (
    <div className="min-h-screen bg-black text-white">
      <Navbar />
      <Hero />
      <Services />
      <Contact />
      
      <footer className="py-6 bg-black text-center text-gray-400">
        <p>&copy; 2024 Beauty Studio. Todos los derechos reservados.</p>
      </footer>
    </div>
  );
}

export default App;