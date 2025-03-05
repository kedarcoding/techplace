import { NextResponse } from 'next/server';
import type { NextRequest } from 'next/server';
import { parse } from 'cookie';

export function middleware(request: NextRequest) {
  const token = request.cookies.get('token')?.value;
  const pathname = request.nextUrl.pathname;

  if (!token) {
    if (pathname.startsWith('/admin') || pathname.startsWith('/user')) {
      return NextResponse.redirect(new URL('/auth/login', request.url));
    }
    return NextResponse.next();
  }

  const userType = request.cookies.get('userType')?.value;

  if (pathname.startsWith('/admin') && userType !== 'admin') {
    return NextResponse.redirect(new URL('/', request.url));
  }

  if (pathname.startsWith('/user') && userType === 'guest') {
    return NextResponse.redirect(new URL('/auth/login', request.url));
  }

  return NextResponse.next();
}

export const config = {
  matcher: ['/admin/:path*', '/user/:path*'],
};
