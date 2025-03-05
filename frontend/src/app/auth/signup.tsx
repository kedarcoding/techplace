'use client';

import { useState } from 'react';

const SignupPage = () => {
  const [role, setRole] = useState('candidate');

  const handleSignup = () => {
    // Call API to register user
    console.log('Signed up as:', role);
  };

  return (
    <div>
      <h2>Signup</h2>
      <form onSubmit={handleSignup}>
        <input type="text" placeholder="Email" required />
        <input type="password" placeholder="Password" required />
        <select value={role} onChange={(e) => setRole(e.target.value)}>
          <option value="candidate">Candidate</option>
          <option value="recruiter">Recruiter</option>
        </select>
        <button type="submit">Sign Up</button>
      </form>
    </div>
  );
};

export default SignupPage;
