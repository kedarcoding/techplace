'use client';

import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Job, PaginatedJobs } from '@/types/jobs';

const JobsPage = () => {
    const [jobs, setJobs] = useState<Job[]>([]);
    const [currentPage, setCurrentPage] = useState<number>(1);
    const [pagination, setPagination] = useState<PaginatedJobs | null>(null);
    const [loading, setLoading] = useState<boolean>(false);  // Loading state

    // Fetch jobs with pagination
    const fetchJobs = async (page: number = 1) => {
        setLoading(true);  // Show loader
        try {
            const res = await axios.get<PaginatedJobs>(`http://localhost:8000/api/jobs?page=${page}`);
            console.log(typeof res.data);
            setJobs(res.data[0].data ?? []);               // Accessing data inside the first item
            setPagination(res.data[0] ?? null);            // Accessing the first item for pagination info
            setCurrentPage(res.data[0].current_page ?? 1);
        } catch (error) {
            console.error('Failed to fetch jobs:', error);
        } finally {
            setLoading(false);  // Hide loader
        }
    };

    // Initial fetch
    useEffect(() => {
        fetchJobs();
    }, []);

    // Handle page change
    const handlePageChange = (url: string | null) => {
        if (url) {
            const page = new URL(url).searchParams.get('page');
            if (page) fetchJobs(parseInt(page, 10));
        }
    };

    return (
        <div className="p-4 max-w-4xl mx-auto">
            <h1 className="text-2xl font-bold mb-4">Job Listings</h1>

            {/* Loading Indicator */}
            {loading ? (
                <p className="text-center text-gray-500">Loading...</p>
            ) : (
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              {jobs?.length > 0 ? (
                  jobs.map((job) => (
                      <div key={job.id} className="border p-4 rounded-lg shadow-md">
                          <h2 className="text-xl font-bold">{job.title}</h2>
                          <p className="text-gray-600 mb-2">{job.job_location} | {job.job_type}</p>
                          <p className="text-gray-800 mb-2">Salary: {job.salary_range}</p>
                          <p className="text-gray-500 mb-2">{job.job_description.slice(0, 80)}...</p>
                          <p className="text-sm text-gray-700">
                              Company: <strong>{job.recruiter?.company ?? 'N/A'}</strong>
                          </p>
                      </div>
                  ))
              ) : (
                  <p className="text-gray-500">No job listings available.</p>
              )}
          </div>          
            )}

            {/* Pagination Controls */}
            {pagination && (
                <div className="flex justify-between mt-4">
                    <button
                        onClick={() => handlePageChange(pagination.prev_page_url)}
                        disabled={!pagination.prev_page_url || loading}
                        className="px-4 py-2 bg-gray-200 rounded disabled:opacity-50"
                    >
                        Previous
                    </button>
                    <span>
                        Page {currentPage} of {Math.ceil(pagination.total / pagination.per_page)}
                    </span>
                    <button
                        onClick={() => handlePageChange(pagination.next_page_url)}
                        disabled={!pagination.next_page_url || loading}
                        className="px-4 py-2 bg-gray-200 rounded disabled:opacity-50"
                    >
                        Next
                    </button>
                </div>
            )}
        </div>
    );
};

export default JobsPage;
