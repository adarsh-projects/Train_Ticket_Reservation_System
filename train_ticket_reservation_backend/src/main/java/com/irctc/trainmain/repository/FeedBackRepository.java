package com.irctc.trainmain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.Feedback;

public interface FeedBackRepository extends JpaRepository<Feedback, String>{

}
