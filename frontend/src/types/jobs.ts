export type Recruiter = {
    id: number;
    company: string;
};

export type Job = {
    id: number;
    recruiter_id: number;
    job_description: string;
    job_location: string;
    job_type: string;
    salary_range: string;
    created_at: string;
    updated_at: string;
    title: string;
    recruiter: Recruiter;
};

export type PaginatedJobs = {
    current_page: number;
    data: Job[];
    next_page_url: string | null;
    prev_page_url: string | null;
    total: number;
    per_page: number;
};
