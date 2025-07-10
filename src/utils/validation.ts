export function validateEmail(email: string): boolean {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

export function validatePhone(phone: string): boolean {
  const phoneRegex = /^\+?[\d\s-]{10,}$/;
  return phoneRegex.test(phone);
}

export interface FormData {
  name: string;
  email: string;
  message: string;
}

export function validateContactForm(data: FormData): { isValid: boolean; errors: string[] } {
  const errors: string[] = [];

  if (!data.name.trim()) {
    errors.push('El nombre es requerido');
  }

  if (!validateEmail(data.email)) {
    errors.push('Email inválido');
  }

  if (!data.message.trim()) {
    errors.push('El mensaje es requerido');
  }

  return {
    isValid: errors.length === 0,
    errors
  };
}