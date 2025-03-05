// pages/index.js
import GuestLayout from '../components/layouts/GuestLayout';
import JobsComponent   from '../components/jobs/page'

const Home = () => {
  return (
    <GuestLayout>
      <h1 className="text-3xl font-bold">Welcome! to the Jobs</h1>
      <p className="mt-4">Make your dreams true! with us</p>
      <JobsComponent></JobsComponent>
    </GuestLayout>
  );
};

export default Home;
