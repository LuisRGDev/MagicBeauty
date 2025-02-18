import React from 'react';
import { NavLink } from './NavLink';

interface MobileMenuProps {
  isOpen: boolean;
  onClose: () => void;
}

export function MobileMenu({ isOpen, onClose }: MobileMenuProps) {
  if (!isOpen) return null;

  return (
    <div className="md:hidden">
      <div className="px-2 pt-2 pb-3 space-y-1">
        {['Inicio', 'Nosotros', 'Servicios', 'Contacto'].map((item) => (
          <div key={item} className="block px-3 py-2" onClick={onClose}>
            <NavLink href={`#${item.toLowerCase()}`}>
              {item}
            </NavLink>
          </div>
        ))}
      </div>
    </div>
  );
}