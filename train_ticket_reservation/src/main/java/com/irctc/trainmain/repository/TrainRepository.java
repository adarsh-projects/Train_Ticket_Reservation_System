package com.irctc.trainmain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.Train;

public interface TrainRepository extends JpaRepository<Train, String>{

}