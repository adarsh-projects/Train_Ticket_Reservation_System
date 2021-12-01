package com.irctc.trainmain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.TrainDetails;

public interface TrainDetailsRepository extends JpaRepository<TrainDetails, String>{
	
}
